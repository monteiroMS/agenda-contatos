<script setup>
import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input'
import { Sheet, SheetContent, SheetTrigger } from '@/components/ui/sheet'
import { Home, Menu, BookUser, Search } from 'lucide-vue-next'
import { Link } from '@inertiajs/vue3'
import Toaster from '@/components/ui/toast/Toaster.vue'
</script>

<template>
    <Toaster />
    <div class="grid min-h-screen w-full md:grid-cols-[220px_1fr] lg:grid-cols-[280px_1fr]">
        <div class="hidden border-r bg-muted/40 md:block">
        <div class="flex h-full max-h-screen flex-col gap-2">
            <div class="flex h-14 items-center border-b px-4 lg:h-[60px] lg:px-6">
            <Link href="/" class="flex items-center gap-2">
                <BookUser class="h-6 w-6" />
                <span class="font-semibold">Agenda de contatos</span>
            </Link>
            </div>
            <div class="flex-1">
            <nav class="grid items-start px-2 text-sm font-medium lg:px-4">
                <Link
                href="/"
                :class="$page.url === '/contatos' ? 'bg-muted text-primary' : 'text-muted-foreground'"
                class="flex items-center gap-3 rounded-lg px-3 py-2 text-muted-foreground transition-all hover:text-primary"
                >
                <Home class="h-4 w-4" />
                Meus contatos
                </Link>
            </nav>
            </div>
            <div>
                <div class="px-4 py-2 text-xs text-muted-foreground">
                    Desenvolvido por
                    <a href="https://github.com/monteiroMS" target="_blank" class="text-primary hover:underline">
                        monteiroMS
                    </a>
                </div>
            </div>
        </div>
        </div>
            <div class="flex flex-col">
        <header class="flex h-14 items-center gap-4 border-b bg-muted/40 px-4 lg:h-[60px] lg:px-6">
            <Sheet>
            <SheetTrigger as-child>
                <Button
                variant="outline"
                size="icon"
                class="shrink-0 md:hidden"
                >
                <Menu class="h-5 w-5" />
                <span class="sr-only">Toggle navigation menu</span>
                </Button>
            </SheetTrigger>
            <SheetContent side="left" class="flex flex-col">
                <nav class="grid gap-2 text-lg font-medium">
                <Link
                    href="#"
                    class="flex items-center gap-2 text-lg font-semibold"
                >
                    <BookUser class="h-6 w-6" />
                    <span class="font-semibold">Agenda de contatos</span>
                </Link>
                <Link
                    href="/"
                    :class="$page.url === '/contatos' ? 'bg-muted text-primary' : 'text-muted-foreground'"
                    class="mx-[-0.65rem] flex items-center gap-4 rounded-xl px-3 py-2 text-muted-foreground hover:text-foreground"
                >
                    <Home class="h-5 w-5" />
                    Meus contatos
                </Link>
                </nav>
            </SheetContent>
            </Sheet>
            <div class="w-full flex-1">
            <form>
                <div class="relative">
                <Search class="absolute left-2.5 top-2.5 h-4 w-4 text-muted-foreground" />
                <Input
                    type="search"
                    placeholder="Pesquise contatos por..."
                    class="w-full appearance-none bg-background pl-8 shadow-none md:w-2/3 lg:w-1/3"
                />
                </div>
            </form>
            </div>
        </header>
        <main class="flex flex-1 flex-col gap-4 p-4 lg:gap-6 lg:p-6">
            <slot />
        </main>
        </div>
    </div>
</template>
