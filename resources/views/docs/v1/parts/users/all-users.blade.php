<h3 class="fw-bold pt-5" id="get-all-users">Get all users</h3>
<hr class="border border-dark border-1 opacity-50">
<p>You can access the list of 20 users by using the <code class="fw-bold text-primary bg-secondary-subtle p-1 rounded">/users</code> endpoint.</p>

<p class="fw-bold">Request:</p>
<pre><code class="fw-bold text-success">[GET] https://fake-store-api.com/api/v1/users</code></pre>

<p class="fw-bold">Response: </p>
<pre class="col-12"><code>{
    "current_page": 1,
    "total_pages": 2,
    "users_per_page": 10,
    "total_users": 20,
    "data": [
        {
            "id": 1,
            "name": "Maggie Weimann",
            "email": "bette79@example.org",
            "password": "GbCRrdpT"
        }
        // ...
    ]
}</code></pre>