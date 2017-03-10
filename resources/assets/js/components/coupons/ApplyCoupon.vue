<template>
    <div>
        <form>
            <div class="input-group">
                <input class="form-control" type="text" v-model="coupon" placeholder="Apply Coupon">
                <span class="input-group-btn">
                    <button class="btn btn-success">Använd kupong</button>
                </span>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                coupon: null
            }
        }
    }
</script>