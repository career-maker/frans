<?php
/**
 * One-time Git Deploy Script
 * IMPORTANT: Delete this file from the server immediately after use!
 * Access: https://yoursite.com/wp-content/themes/franciscan-society/deploy.php?key=fs_deploy_2026
 */

define( 'DEPLOY_KEY', 'fs_deploy_2026' );

if ( empty( $_GET['key'] ) || $_GET['key'] !== DEPLOY_KEY ) {
    http_response_code( 403 );
    die( '403 Forbidden' );
}

$project_dir = '/home/franciscaninter/wp.intersmarthosting.in/fransiscan';

header( 'Content-Type: text/html; charset=utf-8' );
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Git Deploy</title>
<style>
    body { font-family: monospace; background: #0d1117; color: #e6edf3; padding: 2rem; }
    h2 { color: #58a6ff; }
    pre { background: #161b22; border: 1px solid #30363d; padding: 1.5rem; border-radius: 8px; white-space: pre-wrap; word-break: break-all; }
    .ok  { color: #3fb950; }
    .err { color: #f85149; }
    .warn{ color: #d29922; }
</style>
</head>
<body>
<h2>🚀 Franciscan Society — Git Deploy</h2>
<pre>
<?php
function run_cmd( $cmd ) {
    $output = [];
    $return = 0;
    exec( $cmd . ' 2>&1', $output, $return );
    return [ 'output' => implode( "\n", $output ), 'code' => $return ];
}

// Check directory
if ( ! is_dir( $project_dir ) ) {
    echo '<span class="err">❌ Directory not found: ' . htmlspecialchars( $project_dir ) . '</span>' . "\n";
    exit;
}
echo '<span class="ok">✅ Directory found: ' . htmlspecialchars( $project_dir ) . '</span>' . "\n\n";

// Check git
$git_check = run_cmd( 'which git' );
echo 'Git path: ' . htmlspecialchars( trim( $git_check['output'] ) ) . "\n\n";

// git status
echo "--- git status ---\n";
$status = run_cmd( "cd " . escapeshellarg( $project_dir ) . " && git status" );
echo htmlspecialchars( $status['output'] ) . "\n\n";

// --- WORDPRESS HEALTH & CONFIG DIAGNOSTICS ---
echo "--- WordPress Config & Database Diagnostics ---\n";
$wp_config_file   = $project_dir . '/wp-config.php';
$wp_config_backup = $project_dir . '/wp-config-live-backup.php';

if ( ! file_exists( $wp_config_file ) ) {
    echo '<span class="warn">⚠️  wp-config.php NOT found in ' . htmlspecialchars( $project_dir ) . '!</span>' . "\n";
    if ( file_exists( $wp_config_backup ) ) {
        if ( copy( $wp_config_backup, $wp_config_file ) ) {
            chmod( $wp_config_file, 0644 );
            echo '<span class="ok">✅ Restored wp-config.php from wp-config-live-backup.php!</span>' . "\n\n";
        } else {
            echo '<span class="err">❌ Failed to copy backup to wp-config.php</span>' . "\n\n";
        }
    } else {
        echo '<span class="err">❌ Backup wp-config-live-backup.php not found either!</span>' . "\n\n";
    }
} else {
    $config_size = filesize( $wp_config_file );
    echo '<span class="ok">✅ wp-config.php exists (' . $config_size . ' bytes)</span>' . "\n";
    if ( $config_size < 100 && file_exists( $wp_config_backup ) ) {
        copy( $wp_config_backup, $wp_config_file );
        chmod( $wp_config_file, 0644 );
        echo '<span class="ok">✅ Restored truncated wp-config.php with live backup!</span>' . "\n";
    }
}

// Inspect DB connection if wp-config.php exists
if ( file_exists( $wp_config_file ) ) {
    $cfg = file_get_contents( $wp_config_file );
    preg_match( "/define\s*\(\s*['\"]DB_NAME['\"]\s*,\s*['\"]([^'\"]+)['\"]\s*\)/", $cfg, $m_name );
    preg_match( "/define\s*\(\s*['\"]DB_USER['\"]\s*,\s*['\"]([^'\"]+)['\"]\s*\)/", $cfg, $m_user );
    preg_match( "/define\s*\(\s*['\"]DB_PASSWORD['\"]\s*,\s*['\"]([^'\"]+)['\"]\s*\)/", $cfg, $m_pass );
    preg_match( "/define\s*\(\s*['\"]DB_HOST['\"]\s*,\s*['\"]([^'\"]+)['\"]\s*\)/", $cfg, $m_host );
    preg_match( "/\\\$table_prefix\s*=\s*['\"]([^'\"]+)['\"]/", $cfg, $m_prefix );

    $db_name = $m_name[1] ?? '';
    $db_user = $m_user[1] ?? '';
    $db_pass = $m_pass[1] ?? '';
    $db_host = $m_host[1] ?? 'localhost';
    $prefix  = $m_prefix[1] ?? 'wp_';

    echo "DB Name: " . htmlspecialchars( $db_name ) . "\n";
    echo "DB User: " . htmlspecialchars( $db_user ) . "\n";
    echo "DB Host: " . htmlspecialchars( $db_host ) . "\n";
    echo "Table Prefix in wp-config.php: " . htmlspecialchars( $prefix ) . "\n";

    if ( function_exists( 'mysqli_connect' ) ) {
        $conn = @mysqli_connect( $db_host, $db_user, $db_pass, $db_name );
        if ( ! $conn ) {
            echo '<span class="err">❌ DB Connection Failed: ' . htmlspecialchars( mysqli_connect_error() ) . '</span>' . "\n\n";
        } else {
            echo '<span class="ok">✅ DB Connection Successful!</span>' . "\n";
            $res = mysqli_query( $conn, "SHOW TABLES" );
            $all_tables = [];
            while ( $row = mysqli_fetch_array( $res ) ) {
                $all_tables[] = $row[0];
            }
            echo "Total Tables in DB: " . count( $all_tables ) . "\n";
            echo "Tables: " . htmlspecialchars( implode( ', ', array_slice( $all_tables, 0, 15 ) ) ) . "\n";

            // Check options table
            $opt_table = $prefix . 'options';
            if ( in_array( $opt_table, $all_tables ) ) {
                $opt_res = mysqli_query( $conn, "SELECT option_value FROM `{$opt_table}` WHERE option_name='siteurl'" );
                if ( $opt_res && $row = mysqli_fetch_assoc( $opt_res ) ) {
                    echo '<span class="ok">✅ siteurl found in ' . $opt_table . ': ' . htmlspecialchars( $row['option_value'] ) . '</span>' . "\n";
                } else {
                    echo '<span class="err">❌ siteurl NOT found in ' . $opt_table . '!</span>' . "\n";
                }
                $home_res = mysqli_query( $conn, "SELECT option_value FROM `{$opt_table}` WHERE option_name='home'" );
                if ( $home_res && $row = mysqli_fetch_assoc( $home_res ) ) {
                    echo '<span class="ok">✅ home found in ' . $opt_table . ': ' . htmlspecialchars( $row['option_value'] ) . '</span>' . "\n";
                }
                // Check if table needs repair
                $chk = mysqli_query( $conn, "CHECK TABLE `{$opt_table}`" );
                if ( $chk && $chk_row = mysqli_fetch_assoc( $chk ) ) {
                    echo "Table check: " . htmlspecialchars( $chk_row['Msg_type'] . ': ' . $chk_row['Msg_text'] ) . "\n";
                }
            } else {
                echo '<span class="err">❌ Expected options table "' . $opt_table . '" NOT found in DB!</span>' . "\n";
                // Try finding what options table exists
                foreach ( $all_tables as $tbl ) {
                    if ( substr( $tbl, -7 ) === 'options' ) {
                        echo '<span class="warn">Found alternative options table: ' . htmlspecialchars( $tbl ) . '</span>' . "\n";
                        $actual_prefix = substr( $tbl, 0, -7 );
                        echo '<span class="warn">Detected actual prefix in DB: ' . htmlspecialchars( $actual_prefix ) . '</span>' . "\n";
                    }
                }
            }
            mysqli_close( $conn );
            echo "\n";
        }
    }
}

// git fetch
echo "--- git fetch origin ---\n";
$fetch = run_cmd( "cd " . escapeshellarg( $project_dir ) . " && git fetch origin 2>&1" );
echo htmlspecialchars( $fetch['output'] ) . "\n\n";

// git pull
echo "--- git pull origin main ---\n";
$pull = run_cmd( "cd " . escapeshellarg( $project_dir ) . " && git pull origin main 2>&1" );
if ( $pull['code'] === 0 ) {
    echo '<span class="ok">✅ ' . htmlspecialchars( $pull['output'] ) . '</span>' . "\n\n";
} else {
    echo '<span class="err">❌ ' . htmlspecialchars( $pull['output'] ) . '</span>' . "\n\n";

    // Try reset if pull failed (e.g., conflicts)
    echo "--- Retrying with reset (discarding local changes) ---\n";
    $reset = run_cmd( "cd " . escapeshellarg( $project_dir ) . " && git reset --hard HEAD && git pull origin main 2>&1" );
    if ( $reset['code'] === 0 ) {
        echo '<span class="ok">✅ Reset + pull successful: ' . htmlspecialchars( $reset['output'] ) . '</span>' . "\n\n";
    } else {
        echo '<span class="err">❌ Reset + pull also failed: ' . htmlspecialchars( $reset['output'] ) . '</span>' . "\n\n";
    }
}

// Preserve WordPress .htaccess for subdirectory /fransiscan/
$htaccess_path = $project_dir . '/.htaccess';
$htaccess_content = "# BEGIN WordPress\n<IfModule mod_rewrite.c>\nRewriteEngine On\nRewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]\nRewriteBase /fransiscan/\nRewriteRule ^index\\.php$ - [L]\nRewriteCond %{REQUEST_FILENAME} !-f\nRewriteCond %{REQUEST_FILENAME} !-d\nRewriteRule . /fransiscan/index.php [L]\n</IfModule>\n# END WordPress\n";
if ( file_exists( $htaccess_path ) ) {
    $curr_htaccess = file_get_contents( $htaccess_path );
    if ( false === strpos( $curr_htaccess, 'RewriteBase /fransiscan/' ) ) {
        file_put_contents( $htaccess_path, $htaccess_content );
        echo '<span class="ok">✅ Restored .htaccess RewriteBase /fransiscan/</span>' . "\n\n";
    } else {
        echo '<span class="ok">✅ .htaccess RewriteBase /fransiscan/ verified intact</span>' . "\n\n";
    }
}

// Confirm latest commit
echo "--- Latest commit ---\n";
$log = run_cmd( "cd " . escapeshellarg( $project_dir ) . " && git log --oneline -5" );
echo htmlspecialchars( $log['output'] ) . "\n\n";

echo '<span class="warn">⚠️  IMPORTANT: Delete deploy.php from the server now!</span>' . "\n";
echo 'Path to delete: wp-content/themes/franciscan-society/deploy.php' . "\n";
?>
</pre>
<p style="color:#8b949e; font-size:0.85rem;">Franciscan Society Deploy Script — <?php echo date('Y-m-d H:i:s'); ?></p>
</body>
</html>
