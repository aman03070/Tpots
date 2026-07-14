document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('interestModal');
    const closeBtn = document.querySelector('.close-modal');
    const form = document.getElementById('interestForm');
    const successMessage = document.getElementById('modalSuccess');

    // Logic to open modal (attach this to your "Apply Now" buttons)
    document.querySelectorAll('.trigger-modal').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            modal.style.display = 'flex';
        });
    });

    // Close logic
    closeBtn.addEventListener('click', () => {
        modal.style.display = 'none';
        // Optional: Reset form state when closed
        form.style.display = 'block';
        successMessage.style.display = 'none';
    });

    // Form Submission (Mocking the success state)
    form.addEventListener('submit', (e) => {
        e.preventDefault(); // Prevent page reload
        // Here you would normally run an AJAX request to admin-ajax.php
        
        // Show success state
        form.style.display = 'none';
        successMessage.style.display = 'block';
    });
});