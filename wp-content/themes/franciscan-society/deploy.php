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
