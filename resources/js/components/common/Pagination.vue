<script setup>
import {
    Pagination,
    PaginationEllipsis,
    PaginationList,
    PaginationListItem,
} from '@/components/ui/pagination'
import Button from '../ui/button/Button.vue';
import {
    ChevronRightIcon,
    DoubleArrowRightIcon,
    DoubleArrowLeftIcon,
    ChevronLeftIcon
} from '@radix-icons/vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    meta: {
        type: Object,
        required: true
    }
})
</script>

<template>
    <div class="flex justify-between items-end">
        <Pagination :total="meta.total" :sibling-count="1" show-edges :default-page="1">
            <PaginationList class="flex items-center gap-1">
                <Link :href="`${meta.path}?page=1`" as="button" :disabled="meta.current_page == 1">
                    <Button class="w-9 h-9 p-0" variant="outline" :disabled="meta.current_page == 1">
                        <DoubleArrowLeftIcon />
                    </Button>
                </Link>

                <Link :href="`${meta.path}?page=${meta.current_page - 1}`" as="button" :disabled="meta.current_page == 1">
                    <Button class="w-9 h-9 p-0" variant="outline" :disabled="meta.current_page == 1">
                        <ChevronLeftIcon />
                    </Button>
                </Link>

                <template v-for="(item, index) in meta.links.filter(({ label }) => (!label.includes('Next') && !label.includes('Previous')))">
                    <PaginationListItem v-if="item.url" :key="index" :value="item.value" as-child>
                        <Link :href="item.url" >
                            <Button
                                class="w-10 h-10 p-0"
                                :variant="item.active ? 'default' : 'outline'"
                                v-html="item.label"
                            />
                        </Link>
                    </PaginationListItem>
                    <PaginationEllipsis v-else-if="item.label == '...'" :index="index" />
                </template>

                <Link :href="`${meta.path}?page=${meta.current_page + 1}`" as="button" :disabled="meta.current_page == meta.last_page">
                    <Button class="w-9 h-9 p-0" variant="outline" :disabled="meta.current_page == meta.last_page">
                        <ChevronRightIcon />
                    </Button>
                </Link>

                <Link :href="`${meta.path}?page=${meta.last_page}`" as="button" :disabled="meta.current_page == meta.last_page">
                    <Button class="w-9 h-9 p-0" variant="outline" :disabled="meta.current_page == meta.last_page">
                        <DoubleArrowRightIcon />
                    </Button>
                </Link>
            </PaginationList>
        </Pagination>
        <p class="text-xs text-muted-foreground text-right">
            Mostrando <strong>{{ meta.from }} - {{ meta.to }}</strong> de <strong>{{ meta.total }}</strong>
            contatos
        </p>
    </div>
</template>
