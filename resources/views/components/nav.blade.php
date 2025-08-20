<nav class="hidden md:flex space-x-8 items-center">
<a class="text-blue-600 font-medium" href="/">Home</a>
<!-- Categories Dropdown -->
<div class="relative desktop-dropdown">
<button class="text-gray-600 hover:text-blue-600 py-4 transition flex items-center">
                        Categories
                        <i class="fas fa-chevron-down ml-1 text-sm"></i>
</button>
<div class="absolute left-0 w-64 bg-white rounded-md shadow-lg hidden z-50 desktop-dropdown-menu">
<div class="py-2">
<div class="relative desktop-dropdown-sub">
<button class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition flex justify-between items-center w-full text-left">
                                    Web Development
                                    <i class="fas fa-chevron-right text-xs"></i>
</button>
<div class="absolute left-full top-0 mt-0 w-64 bg-white rounded-md shadow-lg hidden desktop-dropdown-submenu">
<a class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition" href="/categories">Frontend</a>
<a class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition" href="/categories">Backend</a>
<a class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition" href="/categories">Full Stack</a>
</div>
</div>
<div class="relative desktop-dropdown-sub">
<button class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition flex justify-between items-center w-full text-left">
                                    Artificial Intelligence
                                    <i class="fas fa-chevron-right text-xs"></i>
</button>
<div class="absolute left-full top-0 mt-0 w-64 bg-white rounded-md shadow-lg hidden desktop-dropdown-submenu">
<a class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition" href="/single-blog">Machine Learning</a>
<a class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition" href="/single-blog">Deep Learning</a>
<a class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition" href="/categories">NLP</a>
</div>
</div>
<a class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition" href="/single-blog">Cloud Computing</a>
<a class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition" href="/single-blog">Cybersecurity</a>
<a class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition" href="/single-blog">Mobile Development</a>
<a class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition" href="/single-blog">DevOps</a>
</div>
</div>
</div>
<a class="text-gray-600 hover:text-blue-600 transition" href="/profile">About</a>
<a class="text-gray-600 hover:text-blue-600 transition" href="/blog">Blog</a>

  {{-- Mobile Menu --}}
    <div id="mobile-menu" class="hidden md:hidden bg-white shadow-md">
        <div class="container mx-auto px-4 py-4">
            <a href="/" class="block py-2 text-blue-600 font-medium">Home</a>
            <a href="/" class="block py-2 text-gray-600 hover:text-blue-600 transition">Articles</a>
            <div class="relative">
                <button
                    class="block py-2 text-gray-600 hover:text-blue-600 transition flex items-center w-full text-left mobile-dropdown-toggle">
                    Categories
                    <i class="fas fa-chevron-down ml-1 text-sm"></i>
                </button>
                <div id="mobile-categories" class="hidden pl-4 mobile-dropdown-menu">
                    <div class="py-1">
                        <div class="relative">
                            <button
                                class="block py-2 text-gray-600 hover:text-blue-600 transition flex items-center w-full text-left mobile-dropdown-sub-toggle">
                                Web Development
                                <i class="fas fa-chevron-down ml-1 text-sm"></i>
                            </button>
                            <div id="mobile-webdev-submenu" class="hidden pl-4 mobile-dropdown-submenu">
                                <a href="/categories" class="block py-2 text-gray-600 hover:text-blue-600 transition">Frontend</a>
                                <a href="/categories" class="block py-2 text-gray-600 hover:text-blue-600 transition">Backend</a>
                                <a href="/categories" class="block py-2 text-gray-600 hover:text-blue-600 transition">Full
                                    Stack</a>
                            </div>
                        </div>
                        <div class="relative">
                            <button
                                class="block py-2 text-gray-600 hover:text-blue-600 transition flex items-center w-full text-left mobile-dropdown-sub-toggle">
                                Artificial Intelligence
                                <i class="fas fa-chevron-down ml-1 text-sm"></i>
                            </button>
                            <div id="mobile-ai-submenu" class="hidden pl-4 mobile-dropdown-submenu">
                                <a href="/single-blog" class="block py-2 text-gray-600 hover:text-blue-600 transition">Machine
                                    Learning</a>
                                <a href="/single-blog" class="block py-2 text-gray-600 hover:text-blue-600 transition">Deep
                                    Learning</a>
                                <a href="/single-blog" class="block py-2 text-gray-600 hover:text-blue-600 transition">NLP</a>
                            </div>
                        </div>
                        <a href="/single-blog" class="block py-2 text-gray-600 hover:text-blue-600 transition">Cloud Computing</a>
                        <a href="/single-blog" class="block py-2 text-gray-600 hover:text-blue-600 transition">Cybersecurity</a>
                        <a href="/single-blog" class="block py-2 text-gray-600 hover:text-blue-600 transition">Mobile
                            Development</a>
                        <a href="/single-blog" class="block py-2 text-gray-600 hover:text-blue-600 transition">DevOps</a>
                    </div>
                </div>
            </div>
            <a href="/profile" class="block py-2 text-gray-600 hover:text-blue-600 transition">About</a>
            <a href="/blog" class="block py-2 text-gray-600 hover:text-blue-600 transition">Blog</a>
        </div>
    </div>
    


</nav>