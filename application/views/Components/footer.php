<body>

</body>

<script>
    const toggleSidebarButton = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');
    const sidebarTitle = document.getElementById('sidebarTitle');
    const homeText = document.getElementById('homeText');
    const settingsText = document.getElementById('settingsText');
    const aboutText = document.getElementById('aboutText');
    const tambahAkun = document.getElementById('tambahAkun');

    toggleSidebarButton.addEventListener('click', () => {
        const isOpen = sidebar.getAttribute('data-open') === 'true';

        if (isOpen) {
            sidebar.classList.remove('w-64');
            sidebar.setAttribute('data-open', 'false');
            sidebarTitle.classList.add('hidden');
            homeText.classList.add('hidden');
            settingsText.classList.add('hidden');
            aboutText.classList.add('hidden');
            tambahAkun.classList.add('hidden');
        } else {
            sidebar.classList.add('w-64');
            sidebar.setAttribute('data-open', 'true');
            sidebarTitle.classList.remove('hidden');
            homeText.classList.remove('hidden');
            settingsText.classList.remove('hidden');
            aboutText.classList.remove('hidden');
            tambahAkun.classList.remove('hidden');
        }
    });
</script>

</html>