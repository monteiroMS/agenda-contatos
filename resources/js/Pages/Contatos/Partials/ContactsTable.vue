<script setup>
import { Button } from '@/components/ui/button';
import {
    DropdownMenuTrigger,
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuLabel,
} from '@/components/ui/dropdown-menu';
import {
    Table,
    TableHeader,
    TableRow,
    TableHead,
    TableBody,
    TableCell,
} from '@/components/ui/table';
import { MoreHorizontal, SquareUserRound, Trash2, Pencil } from 'lucide-vue-next'
import { inject } from 'vue'
import Pagination from './Pagination.vue';

const contatos = inject('contatos')
</script>

<template>
    <div class="flex flex-col gap-6 w-full h-full justify-between p-6">
        <Table>
            <TableHeader>
                <TableRow>
                    <TableHead class="hidden w-[100px] sm:table-cell">
                        <span class="sr-only">img</span>
                    </TableHead>
                    <TableHead>Nome</TableHead>
                    <TableHead>E-mail</TableHead>
                    <TableHead>Endereço</TableHead>
                    <TableHead>Telefone</TableHead>
                    <TableHead>
                        <span class="sr-only">Actions</span>
                    </TableHead>
                </TableRow>
            </TableHeader>
            <TableBody>
                <TableRow v-for="contato in contatos">
                    <TableCell class="hidden sm:table-cell text-center">
                        <SquareUserRound class="h-8 w-8 mx-auto" />
                    </TableCell>
                    <TableCell class="font-medium max-w-[200px] truncate">
                        {{ contato.nome }}
                    </TableCell>
                    <TableCell class="max-w-[200px] truncate">
                        {{ contato.email }}
                    </TableCell>
                    <TableCell class="max-w-[200px] truncate">
                        {{ contato.endereco }}
                    </TableCell>
                    <TableCell>
                        {{ contato.telefone }}
                    </TableCell>
                    <TableCell>
                        <DropdownMenu>
                            <DropdownMenuTrigger as-child>
                            <Button
                                aria-haspopup="true"
                                size="icon"
                                variant="ghost"
                            >
                                <MoreHorizontal class="h-4 w-4" />
                                <span class="sr-only">Toggle menu</span>
                            </Button>
                            </DropdownMenuTrigger>
                            <DropdownMenuContent align="end">
                            <DropdownMenuLabel>Ações</DropdownMenuLabel>
                            <DropdownMenuItem class="cursor-pointer">
                                <Pencil class="text-orange-500" /> Editar
                            </DropdownMenuItem>
                            <DropdownMenuItem class="cursor-pointer">
                                <Trash2 class="text-red-500" /> Excluir
                            </DropdownMenuItem>
                            </DropdownMenuContent>
                        </DropdownMenu>
                    </TableCell>
                </TableRow>
            </TableBody>
        </Table>
        <Pagination
            :list="contatos"
            :total="contatos.length"
        />
    </div>
</template>
