<h3 class="fw-bold pt-5" id="update-a-user">Update a user</h3>
<hr class="border border-dark border-1 opacity-50">
<p>You can update a user by sending an object like the following and adding the <code class="fw-bold text-primary bg-secondary-subtle p-1 rounded">id</code> as a parameter: <code class="fw-bold text-primary bg-secondary-subtle p-1 rounded">/users/&lt;id&gt;</code><id></p>
<p class="fw-bold">Request:</p>
<pre><code class="fw-bold text-success">[PUT] https://fake-store-api.com/api/v1/users/1</code></pre>
<pre><code>// Body
{
    "name": "Change Name",
    "email": "new-email@email.org"
}
</code></pre>

<p class="fw-bold">Response: </p>
<pre><code>{
    "id": 1,
    "name": "Change Name",
    "email": "new-email@email.org",
    "password": "hU8Huk78"
}</code></pre>

<div class="mb-1">
    <i class="bi bi-exclamation-circle"></i>
    <small>Updating a user will not update it into the server.</small>
</div>

<div class="mb-1">
    <i class="bi bi-exclamation-circle"></i>
    <small>Note that it is not necessary to send all user attributes, just send the ones you want to update.</small>
</div>