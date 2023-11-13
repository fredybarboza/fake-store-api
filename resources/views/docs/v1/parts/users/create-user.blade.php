<h3 class="fw-bold pt-5" id="create-a-user">Create a user</h3>
<hr class="border border-dark border-1 opacity-50">
<p>You can create a new user by sending an object like the following to <code class="fw-bold text-primary bg-secondary-subtle p-1 rounded">/users</code></p>
<p class="fw-bold">Request:</p>
<pre><code class="fw-bold text-success">[POST] https://fake-store-api.com/api/v1/users/</code></pre>
<pre><code>// Body
{
    "name": "Jon Doe",
    "email": "jondoeexample@email.com",
    "password": "Huj7gd6Y"
}
</code></pre>

<p class="fw-bold">Response: </p>
<pre><code>{
    "id": 21,
    "name": "Jon Doe",
    "email": "jondoeexample@email.com",
    "password": "Huj7gd6Y"
}
</code></pre>

<div class="mb-1">
    <i class="bi bi-exclamation-circle"></i>
    <small>Adding a new user will not add it into the server.</small>
</div>

