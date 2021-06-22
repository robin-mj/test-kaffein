<template>
<div class="mb-16">

    <index-header />

    <filter-menu :filter="filter" />

    <div v-for="(company, index) in companiesData" :key="index">
        <company-card :company="company" />
    </div>

</div>
</template>

<script>
    import IndexHeader from '@/Components/IndexHeader'
    import CompanyCard from '@/Components/CompanyCard'
    import FilterMenu from '@/Components/FilterMenu'

    export default {
        components: {
            IndexHeader,
            CompanyCard,
            FilterMenu,
        },

        props: ['companies', 'filter'],

        data() {
            return {
                companiesData: this.companies,
                industriesData: this.industries,
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>