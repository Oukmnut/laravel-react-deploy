export default {
  async fetch(request, env) {
    const url = new URL(request.url);

    // Check API key header for security
    if (request.headers.get("X-API-KEY") !== env.API_KEY) {
      return new Response("Unauthorized", { status: 401 });
    }

    if (url.pathname === "/users") {
      // Query the D1 database using the DB binding
      const result = await env.DB.prepare("SELECT * FROM users").all();
      return Response.json(result);
    }

    return new Response("Not Found", { status: 404 });
  },
};
