<h3 class="fw-bold pt-5" id="create-a-product">Create a product</h3>
<hr class="border border-dark border-1 opacity-50">
<p>You can create a new product by sending an object like the following to <code class="fw-bold text-primary bg-secondary-subtle p-1 rounded">/products</code></p>
<p class="fw-bold">Request:</p>
<pre><code class="fw-bold text-success">[POST] https://fake-store-api.com/api/v1/products/</code></pre>
<pre><code>// Body
{
    "name": "New Product",
    "price": "299.99",
    "description": "Product description",
    "category_id": 1,
    "imageUrls": ["https://myimage.com/example"]
}
</code></pre>

<p class="fw-bold">Response: </p>
<pre><code>{
    "id": 21,
    "name": "New Product",
    "price": "299.99",
    "description": "Product description",
    "category": {
        "id": 1,
        "name": "Electronics and Technology"
    },
    "images": [
        "https://myimage.com/example"
    ]
}
</code></pre>

<div class="mb-1">
    <i class="bi bi-exclamation-circle"></i>
    <small>Adding a new product will not add it into the server.</small>
</div>

