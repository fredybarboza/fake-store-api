<p class="fw-bold pt-5 fs-3" id="filter-products">Filter products</p>
<hr class="border border-dark border-1 opacity-50">

<p class="fs-5 fw-bold" id="filter-product-by-name">Filter by name</p>

<p>
By using the <code class="fw-bold text-primary bg-secondary-subtle p-1 rounded">/products</code> endpoint and passing <code class="fw-bold text-primary bg-secondary-subtle p-1 rounded">name</code> as a query parameter, you can filter for products by name. 
</p>

<p class="fw-bold">Request:</p>
<pre><code class="fw-bold text-success">[GET] https://fake-store-api.com/api/v1/products/?name=Generic</code></pre>


<p class="fs-5 fw-bold mt-5" id="filter-product-by-price">Filter by price</p>
<p>&bull; You can filter by minimum price passing <code class="fw-bold text-primary bg-secondary-subtle p-1 rounded">price_min</code> as a query parameter.</p>
<p>&bull; You can filter by maximum price passing <code class="fw-bold text-primary bg-secondary-subtle p-1 rounded">price_max</code> as a query parameter.</p>
<p>&bull; You can also filter by price by joining the two parameters.</p>


<p class="fw-bold">Request:</p>
<pre><code class="fw-bold text-success">[GET] https://fake-store-api.com/api/v1/products/?price_min=100&price_max=700</code></pre>


<p class="fs-5 fw-bold mt-5" id="filter-product-by-category">Filter by category</p>
<p>
By using the <code class="fw-bold text-primary bg-secondary-subtle p-1 rounded">/products</code> endpoint and passing <code class="fw-bold text-primary bg-secondary-subtle p-1 rounded">category_id</code> as a query parameter, you can filter for products by category.
</p>

<p class="fw-bold">Request:</p>
<pre><code class="fw-bold text-success">[GET] https://fake-store-api.com/api/v1/products/?category_id=1</code></pre>


<p class="fs-5 fw-bold mt-5" id="join-filters">Join filters</p>
<p>
You can filter products using all query parameters and merge them all.
</p>
<pre><code class="fw-bold text-success">[GET] 
https://fake-store-api.com/api/v1/products/
?name=Generic&price_min=100&price_max=700&category_id=1</code></pre>
