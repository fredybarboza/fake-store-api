<h3 class="fw-bold pt-5" id="get-a-single-product">Get a single product</h3>
<hr class="border border-dark border-1 opacity-50">
<p>You can get a single product by adding the <code class="fw-bold text-primary bg-secondary-subtle p-1 rounded">id</code> as a parameter: <code class="fw-bold text-primary bg-secondary-subtle p-1 rounded">/products/&lt;id&gt;</code></p>
<p class="fw-bold">Request:</p>
<pre><code class="fw-bold text-success">[GET] https://fake-store-api.com/api/v1/products/1</code></pre>

<p class="fw-bold">Response: </p>
<pre class="col-12"><code>{
    "id": 1,
    "name": "Red leather sofa.",
    "price": "239.99",
    "description": "Product description",
    "category": {
        "id": 3,
        "name": "Home and Decor"
    },
    "images": [
        "https://fake-store-api/storage/uploads/products/zuEW1ndxzt89LCZvi9Zx7NkDhOO21UxNMkN1jsGS.jpg"
    ]
}</code></pre>