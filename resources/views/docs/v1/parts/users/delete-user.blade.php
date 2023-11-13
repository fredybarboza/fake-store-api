<h3 class="fw-bold pt-5" id="delete-a-user">Delete a user</h3>
<hr class="border border-dark border-1 opacity-50">
<p>You can delete a user by adding the <code class="fw-bold text-primary bg-secondary-subtle p-1 rounded">id</code> as a parameter: <code class="fw-bold text-primary bg-secondary-subtle p-1 rounded">/users/&lt;id&gt;</code></p>
<p class="fw-bold">Request:</p>
<pre><code class="fw-bold text-success">[DELETE] https://fake-store-api.com/api/v1/users/1</code></pre>

<p class="fw-bold">Response: </p>
<pre><code>{
    "message": "User deleted",
    "user_id": "1"
}
</code></pre>

<div class="mb-1">
    <i class="bi bi-exclamation-circle"></i>
    <small>Deleting a user will not delete it into the server.</small>
</div>

