<h1>Admin Panel</h1>
<nav class="admin_menu">
    <a class="nav-item" href="{{route('admin-panel')}}">Dashboard</a>
    <a class="nav-item" href="{{route('all-products')}}">View All Products</a>

</nav>
<style>
    .admin_menu{
        width: 80vw;
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        margin-bottom: 20px;
    }
    .admin_menu a{
        font-size: large;
    }
</style>
