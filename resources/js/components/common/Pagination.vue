<script setup>
import { Button } from '@/components/ui/button'
import {
    Pagination,
    PaginationEllipsis,
    PaginationFirst,
    PaginationLast,
    PaginationList,
    PaginationListItem,
    PaginationNext,
    PaginationPrev,
} from '@/components/ui/pagination'
import { ref } from 'vue'

const props = defineProps({
    list: {
        type: Array,
        required: true
    },
    total: {
        type: Number,
        required: true
    },
    perPage: {
        type: Number,
        default: 10
    }
})

const currentPage = ref(1);

const firstPage = () => {

}

const lastPage = () => {

}


const nextPage = () => {
    if (currentPage.value < totalPages.value) {
        currentPage.value++;
    }
}

const prevPage = () => {
    if (currentPage.value > 1) {
        currentPage.value--;
    }
}
</script>

<template>
    <div class="flex justify-between items-end">
        <Pagination v-slot="{ page }" :total="list.length" :sibling-count="1" show-edges :default-page="1">
        <PaginationList v-slot="{ items }" class="flex items-center gap-1">
            <PaginationFirst />
            <PaginationPrev />

            <template v-for="(item, index) in items">
            <PaginationListItem v-if="item.type === 'page'" :key="index" :value="item.value" as-child>
                <Button class="w-10 h-10 p-0" :variant="item.value === page ? 'default' : 'outline'">
                {{ item.value }}
                </Button>
            </PaginationListItem>
            <PaginationEllipsis v-else :key="item.type" :index="index" />
            </template>

            <PaginationNext />
            <PaginationLast />
        </PaginationList>
        </Pagination>
        <p class="text-xs text-muted-foreground text-right">
            Mostrando <strong>{{ (currentPage - 1) * perPage + 1 }} - {{ Math.min(currentPage * perPage, total) }}</strong> de <strong>{{ total }}</strong>
            contatos
        </p>
    </div>
</template>
