<div
    x-init="init()"
    x-data="{
        theme: localStorage.getItem('theme') || 'dark',

         init() {
             let theme = localStorage.getItem('theme');
             let body = document.body;

             if (theme === 'dark') {
                body.classList.add('dark-mode');
                document.querySelectorAll('.toggle-theme .fa-sun-bright').forEach(el => {
                    el.style.display = 'none';
                });

                document.querySelectorAll('.logo').forEach(img => {
                    img.src = img.src.replace('logo-dark.png', 'logo.png');
                });
            } else {
                body.classList.add('light-mode');
                document.querySelectorAll('.toggle-theme .fa-moon').forEach(el => {
                    el.style.display = 'none';
                });

                document.querySelectorAll('.logo').forEach(img => {
                    img.src = img.src.replace('logo.png', 'logo-dark.png');
                });
            }

            this.$watch('theme', value => {
                body.classList.toggle('dark-mode', value === 'dark');
                body.classList.toggle('light-mode', value === 'light');
                localStorage.setItem('theme', value);

                document.querySelectorAll('.toggle-theme .fa-sun-bright').forEach(el => {
                    setTimeout(() => {
                        el.style.display = value === 'light' ? 'block' : 'none';
                    }, 50);
                });

                document.querySelectorAll('.toggle-theme .fa-moon').forEach(el => {
                    setTimeout(() => {
                        el.style.display = value === 'dark' ? 'block' : 'none';
                    }, 50);
                });

                document.querySelectorAll('.logo').forEach(img => {
                    if (value === 'dark')
                        img.src = img.src.replace('logo-dark.png', 'logo.png');
                    else
                        img.src = img.src.replace('logo.png', 'logo-dark.png');
                });

                document.querySelectorAll('.portfolio-item').forEach(el => {
                    if (value === 'dark')
                        el.style.backgroundColor = 'var(--tj-theme-accent-2)';
                    else
                        el.style.backgroundColor = 'var(--tj-off-white)';
                });
            })
         }
    }">
    <div class="header-button toggle-theme" @click="theme = theme === 'dark' ? 'light' : 'dark'">
        <i class="fal fa-sun-bright fa-xl"></i>
        <i class="fal fa-moon fa-xl"></i>
    </div>
</div>
