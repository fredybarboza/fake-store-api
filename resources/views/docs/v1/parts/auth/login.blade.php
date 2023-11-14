<h3 class="fw-bold pt-5" id="authentication">Authentication</h3>
<hr class="border border-dark border-1 opacity-50">
<p>You can do login by sending an object like the following to <code class="fw-bold text-primary bg-secondary-subtle p-1 rounded">/auth/login/</code></p>
<p class="fw-bold">Request:</p>
<pre><code class="fw-bold text-success">[POST] https://fake-store-api.com/api/v1/auth/login</code></pre>
<pre><code>// Body
{
    "email": "cecile26@example.net",
    "password": "4FnzWI61"
}
</code></pre>

<p class="fw-bold">Response: </p>
<pre><code>{"access_token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL3YxL2F1dGgvbG9naW4iLCJpYXQiOjE2OTk4OTg4MzIsImV4cCI6MTY5OTkwMjQzMiwibmJmIjoxNjk5ODk4ODMyLCJqdGkiOiIzb2t5WGVjR2h5VU8xSVVEIiwic3ViIjoiNCIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.ZPcW-I-Rf9ZCPY7GBwBmFlUKJRdx2dcHibSLu5WFBek"}
</code></pre>

<div class="mb-1">
    <i class="bi bi-exclamation-circle"></i>
    <small>You can use any of the users' username and password available in users API to get token, any other usernames return error.</small>
</div>

