<h3 class="fw-bold pt-5" id="pagination">Pagination</h3>
<hr class="border border-dark border-1 opacity-50">
<p>
    The API will automatically paginate the responses. You will receive up to 10 documents per page.
</p>
<p class="fw-bold">Information about the response:</p>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Key</th>
            <th scope="col">Type</th>
            <th scope="col">Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="pt-4 pb-4">current_page</td>
            <td class="pt-4 pb-4">int</td>
            <td class="pt-4 pb-4">The current page of the returned results.</td>
        </tr>

        <tr>
            <td class="pt-4 pb-4">total_pages</td>
            <td class="pt-4 pb-4">int</td>
            <td class="pt-4 pb-4">The amount of pages.</td>
        </tr>

        <tr>
            <td class="pt-4 pb-4">resources_per_page</td>
            <td class="pt-4 pb-4">int</td>
            <td class="pt-4 pb-4">Number of resources displayed per page.</td>
        </tr>

        <tr>
            <td class="pt-4 pb-4">total_resources</td>
            <td class="pt-4 pb-4">int</td>
            <td class="pt-4 pb-4">The total amount of resources available in total.</td>
        </tr>

        <tr>
            <td class="pt-4 pb-4">data</td>
            <td class="pt-4 pb-4">array</td>
            <td class="pt-4 pb-4">Contains the specific resources returned for the current page.</td>
        </tr>

    </tbody>
</table>

<p class="fw-bold">Request:</p>
<pre><code class="fw-bold text-success">[GET] https://fake-store-api.com/api/v1/products</code></pre>

<p class="fw-bold">Response: </p>
<pre class="col-12"><code>{
    "current_page": 1,
    "total_pages": 2,
    "products_per_page": 10,
    "total_products": 20,
    "data": [
        // ...
    ]
}</code></pre>

<p>You can access different pages with the <code class="fw-bold text-primary bg-secondary-subtle p-1 rounded">page</code> parameter. If you don't specify any page, the first page will be shown. For example, in order to access page 2, add <code class="fw-bold text-primary bg-secondary-subtle p-1 rounded">?page=2</code> to the end of the URL.</p>

<p class="fw-bold">Request:</p>
<pre><code class="fw-bold text-success">[GET] https://fake-store-api.com/api/v1/products/?page=2</code></pre>

<p class="fw-bold">Response: </p>
<pre class="col-12"><code>{
    "current_page": 2,
    "total_pages": 2,
    "products_per_page": 10,
    "total_products": 20,
    "data": [
        // ...
    ]
}</code></pre>