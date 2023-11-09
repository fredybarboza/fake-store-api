<h2 id="products" class="fw-bold mt-5"># Products</h2>
<h3 class="fw-bold mt-4"># Get all products</h3>
<p>You can access the list of 20 products by using the <code class="fw-bold text-primary bg-secondary-subtle p-1 rounded">/products</code> endpoint.</p>

<p class="fw-bold">Request:</p>
<pre><code class="fw-bold text-success">[GET] https://fake-store-api.com/api/v1/products</code></pre>

<p class="fw-bold">Response: </p>
<pre class="col-12"><code>[
 {
    "id": 4,
    "title": "Handmade Fresh Table",
    "price": 687,
    "description": "Andy shoes are designed to keeping in...",
    "category": {
      "id": 5,
      "name": "Others",
      "image": "https://placeimg.com/640/480/any?r=0.591926261873231"
    },
    "images": [
      "https://placeimg.com/640/480/any?r=0.9178516507833767",
      "https://placeimg.com/640/480/any?r=0.9300320592588625",
      "https://placeimg.com/640/480/any?r=0.8807778235430017"
    ]
  }
  // ...
]</code></pre>