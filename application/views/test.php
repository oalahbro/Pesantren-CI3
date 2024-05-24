<div class="container mt-5">
    <h2>Form with Terms & Conditions Checklist</h2>
    <form id="termsForm">
        <div class="mb-3">
            <label for="inputEmail" class="form-label">Email address</label>
            <input type="email" class="form-control" id="inputEmail" placeholder="Enter email" required>
        </div>
        <div class="mb-3">
            <label for="inputPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="inputPassword" placeholder="Password" required>
        </div>
        <div class="mb-3">
            <label for="inputText" class="form-label">Example text</label>
            <input type="text" class="form-control" id="inputText" placeholder="Some text" required>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="termsCheck">
            <label class="form-check-label" for="termsCheck">I agree to the Terms & Conditions</label>
        </div>
        <button type="submit" class="btn btn-primary mt-3" id="submitButton" disabled>Submit</button>
    </form>
</div>

<!-- Bootstrap Modal -->
<div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="termsModalLabel">Terms & Conditions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Your terms and conditions content here -->
                <p>This is the content of your terms and conditions. You can add whatever text or agreements you want here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>