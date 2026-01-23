<!-- Header -->
<header>
    <button class='menu-toggle' onclick='toggleSidebar()'><i class='bi bi-list'></i></button>
    <h5>Exam Panel</h5>
    <!-- <div class='d-flex align-items-center'>
        <i class='bi bi-person-circle me-2'></i> User
    </div> -->
</header>
<div class="sidebar" id="sidebar">
    <h4 class="text-white mb-4">🎓 Student Exam</h4>
    <a href='dashboard' class="<?php echo basename($_SERVER['PHP_SELF']) == 'dashboard' ? 'active' : '' ?>">
        <i class='bi bi-speedometer2 me-2'></i> Dashboard
    </a>

    <a href='all_student' class="<?php echo basename($_SERVER['PHP_SELF']) == 'all_student' ? 'active' : '' ?>">
        <i class='bi bi-person-lines-fill me-2'></i> All Students
    </a>
    <a href='register_students'
        class="<?php echo basename($_SERVER['PHP_SELF']) == 'register_students' ? 'active' : '' ?>">
        <i class='bi bi-person-lines-fill me-2'></i> All Register Students
    </a>
    <a href='results' class="<?php echo basename($_SERVER['PHP_SELF']) == 'results' ? 'active' : '' ?>">
        <i class='bi bi-person-lines-fill me-2'></i> All Results
    </a>
    <a href='logout'><i class='bi bi-box-arrow-right me-2'></i> Logout</a>

</div>

<script>
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('show');
}
</script>