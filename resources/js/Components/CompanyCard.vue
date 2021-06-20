<template>
    <div class="flex items-center justify-between mx-6 p-8 rounded-3xl transition duration-200 ease-in-out hover:bg-purple-light hover:shadow font-montserrat font-medium text-gray-900 text-3xl">
        <div class="flex items-center space-x-10">
            <div class="p-14 bg-purple"></div>
            <p>Entreprise</p>
        </div>
        <div>
            <p>Secteur</p>
        </div>
        <div>
            <p>Ville</p>
        </div>
        <div>
            <p>Pays</p>
        </div>
        <div @click="showPopUp = true" class="py-4 px-12 bg-purple text-white rounded-full cursor-pointer select-none">
            Voir la fiche
        </div>
    </div>

    <pop-up v-if="showPopUp" @cancel="cancel" />
</template>

<script>
    import PopUp from '@/Components/PopUp'

    export default {
        components : {
            PopUp,
        },

        data() {
            return {
                showPopUp: true
            }
        },
        
        methods: {
            cancel() {
                this.showPopUp = false
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>