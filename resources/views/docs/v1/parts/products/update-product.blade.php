<h3 class="fw-bold pt-5" id="update-a-product">Update a product</h3>
<hr class="border border-dark border-1 opacity-50">
<p>You can update a product by sending an object like the following and adding the <code class="fw-bold text-primary bg-secondary-subtle p-1 rounded">id</code> as a parameter: <code class="fw-bold text-primary bg-secondary-subtle p-1 rounded">/products/&lt;id&gt;</code><id></p>
<p class="fw-bold">Request:</p>
<pre><code class="fw-bold text-success">[PUT] https://fake-store-api.com/api/v1/products/1</code></pre>
<pre><code>// Body
{
    "name": "Updated name",
    "price": "300"
}
</code></pre>

<p class="fw-bold">Response: </p>
<pre><code>{
    "id": 1,
    "name": "Updated name",
    "price": "300",
    "description": "Product description",
    "category": {
        "id": 3,
        "name": "Home and Decor"
    },
    "images": [
        "https://fake-store-api/storage/uploads/products/zuEW1ndxzt89LCZvi9Zx7NkDhOO21UxNMkN1jsGS.jpg"
    ]
}</code></pre>

<div class="mb-1">
    <i class="bi bi-exclamation-circle"></i>
    <small>Updating a product will not update it into the server.</small>
</div>

<div class="mb-1">
    <i class="bi bi-exclamation-circle"></i>
    <small>Note that it is not necessary to send all product attributes, just send the ones you want to update.</small>
</div>