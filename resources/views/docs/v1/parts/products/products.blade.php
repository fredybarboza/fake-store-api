<h3 class="fw-bold pt-5" id="get-all-products">Get all products</h3>
<hr class="border border-dark border-1 opacity-50">
<p>You can access the list of 20 products by using the <code class="fw-bold text-primary bg-secondary-subtle p-1 rounded">/products</code> endpoint.</p>

<p class="fw-bold">Request:</p>
<pre><code class="fw-bold text-success">[GET] https://fake-store-api.com/api/v1/products</code></pre>

<p class="fw-bold">Response: </p>
<pre class="col-12"><code>{
    "current_page": 1,
    "total_pages": 2,
    "products_per_page": 10,
    "total_products": 20,
    "data": [
        {
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
        }
        // ...
    ]
}</code></pre>