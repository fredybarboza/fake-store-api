<h3 class="fw-bold pt-5" id="get-all-categories">Get all categories</h3>
<hr class="border border-dark border-1 opacity-50">
<p>You can access the list of 4 categories by using the <code class="fw-bold text-primary bg-secondary-subtle p-1 rounded">/categories</code> endpoint.</p>

<p class="fw-bold">Request:</p>
<pre><code class="fw-bold text-success">[GET] https://fake-store-api.com/api/v1/categories</code></pre>

<p class="fw-bold">Response: </p>
<pre class="col-12"><code>[
    {
        "id": 1,
        "name": "Electronics and Technology"
    },
    {
        "id": 2,
        "name": "Clothing and Fashion"
    }
    //..
]</code></pre>