<h3 class="fw-bold pt-5" id="get-a-single-user">Get a single user</h3>
<hr class="border border-dark border-1 opacity-50">
<p>You can get a single user by adding the <code class="fw-bold text-primary bg-secondary-subtle p-1 rounded">id</code> as a parameter: <code class="fw-bold text-primary bg-secondary-subtle p-1 rounded">/users/&lt;id&gt;</code></p>
<p class="fw-bold">Request:</p>
<pre><code class="fw-bold text-success">[GET] https://fake-store-api.com/api/v1/users/1</code></pre>

<p class="fw-bold">Response: </p>
<pre class="col-12"><code>{
    "id": 1,
    "name": "Maggie Weimann",
    "email": "bette79@example.org",
    "password": "GbCRrdpT"
}</code></pre>