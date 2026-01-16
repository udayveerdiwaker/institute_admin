<!-- Header -->
<header>
    <button class='menu-toggle' onclick='toggleSidebar()'><i class='bi bi-list'></i></button>
    <h5>Admin Panel</h5>
    <!-- <div class = 'd-flex align-items-center'>
<i class = 'bi bi-person-circle me-2'></i> Admin
</div> -->
</header>
<div class="sidebar" id="sidebar">
    <!-- <h4 class="text-white mb-4">🎓 Student Panel</h4> -->
    <a href='dashboard.php' class="<?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : '' ?>">
        <i class='bi bi-speedometer2 me-2'></i> Dashboard
    </a>

    <a href='all_students.php'
        class="<?php echo basename($_SERVER['PHP_SELF']) == 'all_students.php' ? 'active' : '' ?>">
        <i class='bi bi-person-lines-fill me-2'></i> All Students
    </a>
    <a href='register_students.php'
        class="<?php echo basename($_SERVER['PHP_SELF']) == 'register_students.php' ? 'active' : '' ?>">
        <i class='bi bi-person-lines-fill me-2'></i> All Register Students
    </a>
    <a href='results.php' class="<?php echo basename($_SERVER['PHP_SELF']) == 'results.php' ? 'active' : '' ?>">
        <i class='bi bi-person-lines-fill me-2'></i> All Results
    </a>
    <a href='../logout.php'><i class='bi bi-box-arrow-right me-2'></i> Logout</a>

</div>

<script>
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('show');
}
</script>