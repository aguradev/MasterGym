<script setup>
import { toRefs, onMounted, onUnmounted, ref } from 'vue';
import { route } from 'ziggy-js';
import axiosHttp from '@lib/axios';

const props = defineProps({
    id: String
})

const { id } = toRefs(props);
const featureDataDetail = ref(null);

async function fetchFeatureDetail() {
    try {
        const res = await axiosHttp.get(route('plan_feature.json.detail', {
            tenantPlanFeature: id.value
        }))

        if (res.status == 200) {
            const data = await res.data;
            featureDataDetail.value = { ...data.results };
        }
    } catch (e) {
        console.log(e);
    }
}

await fetchFeatureDetail();

</script>

<template>
    <section class="grid mt-8 lg:grid-cols-2 gap-y-8 lg:gap-y-6" v-if="featureDataDetail">
        <div>
            <h4 class="mb-3 text-xl font-semibold">Feature</h4>
            <p class="text-lg">{{ featureDataDetail.name }}</p>
        </div>
        <div>
            <h4 class="mb-3 text-xl font-semibold">Data created</h4>
            <p class="text-lg">{{ featureDataDetail.date_created_format }}</p>
        </div>
        <div>
            <h4 class="mb-3 text-xl font-semibold">Date updated</h4>
            <p class="text-lg">{{ featureDataDetail.updated_at ? featureDataDetail.date_updated_format : '-'
                }}</p>
        </div>
    </section>

    <section v-else>
        <p>Feature plan not found</p>
    </section>
</template>
