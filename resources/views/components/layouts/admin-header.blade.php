<header class="sticky top-0 inset-x-0 flex flex-wrap md:justify-start md:flex-nowrap z-48 w-full  border-b  text-sm py-2.5 lg:ps-65 bg-[var(--color-neutral-800)] border-[var(--color-dark-50)]">
            <nav class="px-4 sm:px-6 flex basis-full items-center w-full mx-auto">
                {{-- app logo  --}}
                <x-layouts.admin-header-app-logo />
            
                <div class="w-full flex items-center justify-end ms-auto md:justify-between gap-x-1 md:gap-x-3">
            
                    <div class="hidden md:block">
                  
                    </div>
            
                    <div class="flex flex-row items-center justify-end gap-1">
                    
            
            
                    <button type="button" class="p-2 bg-red-600 relative inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent text-gray-800 hover:bg-red-100 focus:outline-hidden focus:bg-red-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-red-700 dark:focus:bg-red-700">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                        <span>Logout</span>
                    </button>
            
                 
                    </div>
                </div>
            </nav>
        </header>