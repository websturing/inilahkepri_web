<template>
    <div>
        <headline></headline>
        <news></news>
    </div>
</template>

<script>
    import urlBase from '@/js/url';
    import headline from '@/js/components/utama/headline';
    import news from '@/js/components/utama/news';
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        components: {
            headline,
            news,
        },
    }

</script>
