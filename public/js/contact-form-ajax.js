/**
 * AJAX Form Submission Handler for Contact Forms
 *
 * Features:
 * - Prevents page reload on form submission
 * - Shows loading state during submission
 * - Displays success/error messages dynamically
 * - Handles validation errors gracefully
 * - Auto-hides success messages after 5 seconds
 */

class ContactFormHandler {
    constructor(formId) {
        this.form = document.getElementById(formId);
        if (!this.form) return;

        this.submitBtn = this.form.querySelector('button[type="submit"]');
        this.originalBtnText = this.submitBtn.innerHTML;

        this.init();
    }

    init() {
        this.form.addEventListener('submit', (e) => this.handleSubmit(e));
    }

    async handleSubmit(e) {
        e.preventDefault();
        console.log('Form submitted!');

        this.setLoadingState(true);
        this.removeMessages();

        try {
            const formData = new FormData(this.form);
            console.log('Form data prepared, sending to:', this.form.action);

            const response = await fetch(this.form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                }
            });

            console.log('Response status:', response.status);

            // Check if response is OK
            if (!response.ok) {
                console.error('Response not OK:', response.status, response.statusText);
                throw new Error(`Server error: ${response.status}`);
            }

            const data = await response.json();
            console.log('Response data:', data);

            if (data.success) {
                console.log('Success! Showing message:', data.message);
                this.showMessage('success', data.message);
                this.form.reset();
            } else if (data.errors) {
                console.log('Validation errors:', data.errors);
                const errors = Object.values(data.errors).flat();
                this.showMessage('danger', 'Please fix the following errors:', errors);
            } else {
                console.log('Unexpected response format:', data);
                this.showMessage('danger', 'An unexpected error occurred. Please try again.');
            }
        } catch (error) {
            console.error('Form submission error:', error);
            this.showMessage('danger', 'An error occurred. Please try again later.');
        } finally {
            this.setLoadingState(false);
        }
    }

    setLoadingState(isLoading) {
        this.submitBtn.disabled = isLoading;
        this.submitBtn.innerHTML = isLoading
            ? '<i class="fa-solid fa-spinner fa-spin me-2"></i>Sending...'
            : this.originalBtnText;
    }

    showMessage(type, message, errors = []) {
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type} ajax-alert`;
        alertDiv.setAttribute('role', 'alert');
        alertDiv.style.cssText = `
            background-color: ${type === 'success' ? '#d4edda' : '#f8d7da'};
            color: ${type === 'success' ? '#155724' : '#721c24'};
            padding: 1rem;
            border-radius: 0.5rem;
            margin-top: 1rem;
            margin-bottom: 1rem;
            text-align: center;
            font-size: 16px;
        `;

        let content = `<strong>${type === 'success' ? 'Success!' : 'Error!'}</strong> ${message}`;

        if (errors.length > 0) {
            content += '<ul class="mb-0 mt-2" style="list-style-position: inside;">';
            errors.forEach(error => content += `<li>${error}</li>`);
            content += '</ul>';
        }

        alertDiv.innerHTML = content;

        // Try multiple strategies to insert the message
        const submitBtnContainer = this.submitBtn.closest('.text-center');
        if (submitBtnContainer) {
            // For home page contact form
            submitBtnContainer.appendChild(alertDiv);
        } else {
            // For quote page - insert after textarea (before button)
            const textarea = this.form.querySelector('textarea');
            if (textarea) {
                textarea.parentNode.insertBefore(alertDiv, this.submitBtn);
            } else {
                // Fallback - insert before submit button
                this.submitBtn.parentNode.insertBefore(alertDiv, this.submitBtn);
            }
        }

        // Scroll to the message
        alertDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });

        if (type === 'success') {
            setTimeout(() => {
                alertDiv.style.transition = 'opacity 0.5s';
                alertDiv.style.opacity = '0';
                setTimeout(() => alertDiv.remove(), 500);
            }, 5000);
        }
    }

    removeMessages() {
        document.querySelectorAll('.ajax-alert').forEach(alert => alert.remove());
    }
}

// Note: Initialize the handler in your page with: new ContactFormHandler('your_form_id');
