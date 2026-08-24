/**
 * Franciscan Society - Universal Reusable Form Validator & Security Engine
 *
 * Provides client-side validation, international formatting, accessible error
 * states, anti-spam honeypot management, and double-submission protection.
 *
 * @version 1.1.0
 */

(function(window, document) {
    'use strict';

    // Validation Regular Expressions & Business Rules
    const Patterns = {
        // Unicode-aware name supporting international alphabets, spaces, apostrophes, hyphens (2 to 100 chars)
        name: /^[\p{L}\p{M}][\p{L}\p{M}\s.'-]{1,99}$/u,

        // RFC 5322 compliant email regex supporting internationalized domains, tags (+test), and subdomains
        email: /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)+$/,

        // International phone: optional +, digits, spaces, hyphens, parens (7 to 20 chars)
        phone: /^\+?[0-9\s().-]{7,20}$/,

        // Valid ISO calendar date: YYYY-MM-DD
        date: /^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01])$/,

        // Valid HTTP/HTTPS URL
        url: /^https?:\/\/[^\s$.?#].[^\s]*$/i,

        // Common bogus repeated phone patterns (e.g. 0000000000, 1111111111)
        repeatedDigits: /^(\+?[0-9\s().-]*?)(\d)\2{6,}(.*?)$/,

        // Strict HTML / Script / Event-handler injection detector
        htmlOrScript: /<[^>]+>|<\s*script\b|javascript:|on\w+\s*=/i
    };

    /**
     * Trim and normalize whitespace
     */
    function cleanInput(val) {
        return (val || '').toString().trim().replace(/\s+/g, ' ');
    }

    /**
     * Validate an individual form field based on attributes and rules
     */
    function validateField(input) {
        const rawVal = input.value || '';
        const val = cleanInput(rawVal);
        const type = input.getAttribute('type') || input.tagName.toLowerCase();
        const name = input.getAttribute('name') || '';
        const isRequired = input.hasAttribute('required');
        const minLength = parseInt(input.getAttribute('minlength'), 10) || 0;
        const maxLength = parseInt(input.getAttribute('maxlength'), 10) || 0;

        let isValid = true;
        let errorMessage = '';

        // 1. Strict Script & HTML Tag Rejection Check
        if (Patterns.htmlOrScript.test(rawVal) || /<[a-z/!\?][^>]*>/i.test(rawVal)) {
            isValid = false;
            errorMessage = 'HTML tags, scripts, and code injections are not permitted. Please use plain text only.';
            return { isValid, errorMessage };
        }

        // 2. Required Check
        if (isRequired && val.length === 0) {
            isValid = false;
            const label = input.getAttribute('data-label') || (input.placeholder ? input.placeholder.replace(/\s*\*.*$/, '') : 'This field');
            errorMessage = `${label} is required.`;
            return { isValid, errorMessage };
        }

        // Optional and empty is valid
        if (!isRequired && val.length === 0) {
            return { isValid: true, errorMessage: '' };
        }

        // 3. Length Enforcements
        if (minLength > 0 && val.length < minLength) {
            isValid = false;
            errorMessage = `Must be at least ${minLength} characters.`;
            return { isValid, errorMessage };
        }
        if (maxLength > 0 && val.length > maxLength) {
            isValid = false;
            errorMessage = `Cannot exceed ${maxLength} characters.`;
            return { isValid, errorMessage };
        }

        // 4. Type-Specific Validation
        if (type === 'email' || name.includes('email')) {
            if (!Patterns.email.test(val) || val.includes('..') || val.length > 120) {
                isValid = false;
                errorMessage = 'Please enter a valid email address (e.g. name@domain.com).';
            }
        } else if (type === 'tel' || name.includes('phone')) {
            const digitsOnly = val.replace(/\D/g, '');
            if (!Patterns.phone.test(val) || digitsOnly.length < 7 || digitsOnly.length > 15) {
                isValid = false;
                errorMessage = 'Please enter a valid international phone number.';
            } else if (/^(\d)\1+$/.test(digitsOnly)) {
                // Reject all repeated digits (0000000, 1111111)
                isValid = false;
                errorMessage = 'Please enter a genuine contact phone number.';
            }
        } else if (type === 'url' || name.includes('url')) {
            if (!Patterns.url.test(val)) {
                isValid = false;
                errorMessage = 'Please enter a valid URL beginning with http:// or https://';
            }
        } else if (type === 'date' || name.includes('date')) {
            if (!Patterns.date.test(val)) {
                isValid = false;
                errorMessage = 'Please enter a valid date (YYYY-MM-DD).';
            } else {
                const parsedDate = new Date(val);
                if (isNaN(parsedDate.getTime())) {
                    isValid = false;
                    errorMessage = 'Please enter a valid calendar date.';
                }
            }
        } else if (input.tagName.toLowerCase() === 'select') {
            if (val === '' || val === '0') {
                isValid = false;
                errorMessage = 'Please select a valid option from the list.';
            }
        } else if (name.includes('name') || name === 'f_name') {
            if (val.length < 2) {
                isValid = false;
                errorMessage = 'Name must contain at least 2 characters.';
            } else if (!Patterns.name.test(val)) {
                isValid = false;
                errorMessage = 'Please enter a valid full name.';
            }
        } else if (input.tagName.toLowerCase() === 'textarea' || name.includes('message') || name.includes('content') || name.includes('intention')) {
            if (isRequired && val.length < 5) {
                isValid = false;
                errorMessage = 'Please write a message with at least 5 characters.';
            }
        }

        return { isValid, errorMessage };
    }

    /**
     * Display or remove inline error message and visual state on a field
     */
    function setFieldState(input, result) {
        const parent = input.closest('.fs-input-group, .form-group, .input-wrap') || input.parentElement;
        let errorEl = parent ? parent.querySelector('.fs-field-error-msg') : null;

        if (!result.isValid) {
            input.setAttribute('aria-invalid', 'true');
            input.classList.add('is-invalid');
            input.style.borderColor = '#ef4444';

            if (!errorEl && parent) {
                errorEl = document.createElement('span');
                errorEl.className = 'fs-field-error-msg';
                errorEl.style.cssText = 'display: block; color: #ef4444; font-size: 0.78rem; margin-top: 0.35rem; font-family: "Instrument Sans", sans-serif; font-weight: 600; line-height: 1.3;';
                parent.appendChild(errorEl);
            }
            if (errorEl) {
                errorEl.textContent = result.errorMessage;
                errorEl.style.display = 'block';
            }
        } else {
            input.removeAttribute('aria-invalid');
            input.classList.remove('is-invalid');
            input.style.borderColor = '';

            if (errorEl) {
                errorEl.textContent = '';
                errorEl.style.display = 'none';
            }
        }
    }

    /**
     * Universal Form Binder
     */
    function bindForm(form, options = {}) {
        if (!form || form.dataset.validatorBound === 'true') return;
        form.dataset.validatorBound = 'true';
        form.setAttribute('novalidate', 'true');

        const inputs = Array.from(form.querySelectorAll('input, select, textarea')).filter(
            el => el.type !== 'hidden' && el.type !== 'submit' && el.name !== 'website_hp'
        );

        // Real-time validation on blur & input
        inputs.forEach(input => {
            input.addEventListener('blur', () => {
                const res = validateField(input);
                setFieldState(input, res);
            });

            input.addEventListener('input', () => {
                if (input.classList.contains('is-invalid') || Patterns.htmlOrScript.test(input.value)) {
                    const res = validateField(input);
                    setFieldState(input, res);
                }
            });

            if (input.tagName.toLowerCase() === 'select') {
                input.addEventListener('change', () => {
                    const res = validateField(input);
                    setFieldState(input, res);
                });
            }
        });

        // Form Submit Interceptor
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            let firstInvalid = null;
            let formIsValid = true;

            inputs.forEach(input => {
                const res = validateField(input);
                setFieldState(input, res);
                if (!res.isValid) {
                    formIsValid = false;
                    if (!firstInvalid) firstInvalid = input;
                }
            });

            if (!formIsValid) {
                if (firstInvalid) {
                    firstInvalid.focus();
                    firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
                return false;
            }

            // Anti-Spam Honeypot Verification
            const hpField = form.querySelector('input[name="website_hp"]');
            if (hpField && hpField.value.trim() !== '') {
                console.warn('Spam submission detected via honeypot.');
                if (options.onSuccess) {
                    options.onSuccess({ message: 'Thank you! Your message has been received.' });
                }
                form.reset();
                return false;
            }

            // Prevent Double Submissions
            const submitBtn = form.querySelector('button[type="submit"], input[type="submit"]');
            const originalBtnHtml = submitBtn ? submitBtn.innerHTML : '';

            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.classList.add('is-loading');
                if (submitBtn.tagName.toLowerCase() === 'button') {
                    submitBtn.innerHTML = '<span style="display:inline-flex; align-items:center; gap:0.5rem;"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="spin-loader" style="animation:fsSpin 0.8s linear infinite;"><path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/></svg> Submitting...</span>';
                }
            }

            // Prepare Payload
            const formData = new FormData(form);
            const ajaxUrl = options.ajaxUrl || (typeof franciscan_ajax !== 'undefined' ? franciscan_ajax.ajax_url : '/wp-admin/admin-ajax.php');
            const nonce = options.nonce || (typeof franciscan_ajax !== 'undefined' ? franciscan_ajax.nonce : '');

            if (nonce && !formData.has('security')) {
                formData.append('security', nonce);
            }

            fetch(ajaxUrl, {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.classList.remove('is-loading');
                    submitBtn.innerHTML = originalBtnHtml;
                }

                if (data.success) {
                    form.reset();
                    inputs.forEach(input => setFieldState(input, { isValid: true }));
                    const successMsg = data.data?.message || 'Thank you! Your message has been received. Our friars will respond within 24–48 hours. Peace and Good.';
                    showInlineFormFeedback(form, successMsg, false);
                    if (options.onSuccess) {
                        options.onSuccess(data.data);
                    }
                } else {
                    const errorMsg = data.data?.message || 'Validation failed. Please correct any errors and retry.';
                    showInlineFormFeedback(form, errorMsg, true);
                    if (options.onError) {
                        options.onError(data.data);
                    }
                }
            })
            .catch(err => {
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.classList.remove('is-loading');
                    submitBtn.innerHTML = originalBtnHtml;
                }
                const netErr = 'Network connection issue. Please retry in a moment.';
                showInlineFormFeedback(form, netErr, true);
                if (options.onError) {
                    options.onError({ message: netErr });
                }
            });
        });
    }

    /**
     * Inline Form Feedback Box (Arranged Neatly Under Submit Button)
     */
    function showInlineFormFeedback(form, message, isError = false) {
        if (!form) return;

        // Remove any existing feedback box
        let feedback = form.querySelector('.fs-form-feedback');
        if (!feedback) {
            feedback = document.createElement('div');
            feedback.className = 'fs-form-feedback';
            feedback.setAttribute('role', 'alert');
            feedback.setAttribute('aria-live', 'polite');
            
            // Insert directly after submit button's parent container or after button
            const submitBtn = form.querySelector('button[type="submit"], input[type="submit"]');
            if (submitBtn && submitBtn.parentElement && submitBtn.parentElement !== form) {
                submitBtn.parentElement.insertAdjacentElement('afterend', feedback);
            } else if (submitBtn) {
                submitBtn.insertAdjacentElement('afterend', feedback);
            } else {
                form.appendChild(feedback);
            }
        }

        // Determine if form is on dark or light background
        const isDarkTheme = form.id === 'home-quick-inquiry-form' || form.closest('#inquiry-section') || form.closest('.dark-theme');

        // Style container neatly
        if (isError) {
            feedback.style.cssText = isDarkTheme
                ? 'margin-top: 1rem; padding: 0.95rem 1.3rem; border-radius: 12px; background: rgba(239, 68, 68, 0.15); border: 1.5px solid #ef4444; color: #fca5a5; font-family: "Instrument Sans", sans-serif; font-size: 0.9rem; font-weight: 600; line-height: 1.5; text-align: center; display: flex; align-items: center; justify-content: center; gap: 0.6rem; animation: fsFeedbackFade 0.4s ease forwards; box-shadow: 0 8px 25px rgba(0,0,0,0.3);'
                : 'margin-top: 1rem; padding: 0.95rem 1.3rem; border-radius: 12px; background: #fef2f2; border: 1.5px solid #ef4444; color: #991b1b; font-family: "Instrument Sans", sans-serif; font-size: 0.9rem; font-weight: 600; line-height: 1.5; text-align: center; display: flex; align-items: center; justify-content: center; gap: 0.6rem; animation: fsFeedbackFade 0.4s ease forwards;';
            feedback.innerHTML = `<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg><span>${message}</span>`;
        } else {
            feedback.style.cssText = isDarkTheme
                ? 'margin-top: 1rem; padding: 0.95rem 1.3rem; border-radius: 12px; background: rgba(230, 200, 136, 0.12); border: 1.5px solid #e6c888; color: #ffffff; font-family: "Instrument Sans", sans-serif; font-size: 0.9rem; font-weight: 600; line-height: 1.5; text-align: center; display: flex; align-items: center; justify-content: center; gap: 0.6rem; animation: fsFeedbackFade 0.4s ease forwards; box-shadow: 0 8px 25px rgba(0,0,0,0.3);'
                : 'margin-top: 1rem; padding: 0.95rem 1.3rem; border-radius: 12px; background: rgba(74, 42, 24, 0.06); border: 1.5px solid #4A2A18; color: #4A2A18; font-family: "Instrument Sans", sans-serif; font-size: 0.9rem; font-weight: 600; line-height: 1.5; text-align: center; display: flex; align-items: center; justify-content: center; gap: 0.6rem; animation: fsFeedbackFade 0.4s ease forwards;';
            feedback.innerHTML = `<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="${isDarkTheme ? '#e6c888' : '#4A2A18'}" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg><span>${message}</span>`;
        }

        feedback.style.display = 'flex';

        // Auto-dismiss feedback when user starts modifying form inputs
        const inputs = form.querySelectorAll('input, select, textarea');
        const clearFeedback = () => {
            if (feedback && feedback.style.display !== 'none') {
                feedback.style.opacity = '0';
                setTimeout(() => { feedback.style.display = 'none'; feedback.style.opacity = '1'; }, 300);
            }
            inputs.forEach(inp => inp.removeEventListener('input', clearFeedback));
        };
        inputs.forEach(inp => inp.addEventListener('input', clearFeedback, { once: true }));
    }

    /**
     * Accessible Global Toast Notification Helper
     */
    function showGlobalToast(message, isError = false) {
        let toast = document.getElementById('fs-global-toast');
        if (!toast) {
            toast = document.createElement('div');
            toast.id = 'fs-global-toast';
            toast.setAttribute('role', 'alert');
            toast.setAttribute('aria-live', 'assertive');
            toast.style.cssText = 'position:fixed; bottom:30px; right:30px; padding:0.9rem 1.8rem; border-radius:12px; font-family:"Instrument Sans",sans-serif; font-weight:700; font-size:0.92rem; z-index:999999; box-shadow:0 14px 40px rgba(0,0,0,0.5); transition:opacity 0.3s ease, transform 0.3s ease; transform:translateY(0);';
            document.body.appendChild(toast);
        }

        if (isError) {
            toast.style.background = '#3f1111';
            toast.style.color = '#fca5a5';
            toast.style.border = '1.5px solid #ef4444';
        } else {
            toast.style.background = '#0c1727';
            toast.style.color = '#e6c888';
            toast.style.border = '1.5px solid #e6c888';
        }

        toast.textContent = message;
        toast.style.display = 'block';
        toast.style.opacity = '1';

        setTimeout(() => {
            toast.style.opacity = '0';
            setTimeout(() => { toast.style.display = 'none'; }, 300);
        }, 4000);
    }

    // Auto-bind forms on DOM ready
    document.addEventListener('DOMContentLoaded', () => {
        // Keyframe injection for smooth loading spinner & feedback fade
        if (!document.getElementById('fs-validator-styles')) {
            const style = document.createElement('style');
            style.id = 'fs-validator-styles';
            style.textContent = `
                @keyframes fsSpin { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
                @keyframes fsFeedbackFade { 0% { opacity: 0; transform: translateY(-8px); } 100% { opacity: 1; transform: translateY(0); } }
                .is-invalid { border-color: #ef4444 !important; }
            `;
            document.head.appendChild(style);
        }

        // Bind main contact form if present
        const contactForm = document.getElementById('fs-contact-form');
        if (contactForm) {
            bindForm(contactForm);
        }

        // Bind homepage quick inquiry form if present
        const homeForm = document.getElementById('home-quick-inquiry-form');
        if (homeForm) {
            bindForm(homeForm);
        }
    });

    // Expose validator API globally
    window.FranciscanValidator = {
        validateField,
        bindForm,
        showInlineFormFeedback,
        showGlobalToast
    };

})(window, document);
