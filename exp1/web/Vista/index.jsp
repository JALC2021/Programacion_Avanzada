<%-- 
    Document   : index
    Created on : 12-mar-2018, 18:27:39
    Author     : jalc
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <form action="">
            <label>Nombre:<input name="nombre" type="text" /></label>
            <br />
            <label>Email:<input name="email" type="email" /></label>
        </form>


        <%
            String nombre = request.getParameter("nombre");
            String email = request.getParameter("email");
        %>
        <jsp:forward page="it.login.actions" />
        <%=nombre%>
        <%=email%>
    </body>
</html>
