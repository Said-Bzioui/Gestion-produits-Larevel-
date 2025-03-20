import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

function ingredientsComponent() {
    return {
        selectedIngredient: [], // قائمة المكونات المختارة
        availableIngredient: ["Tomate", "Oignon", "Poulet", "Fromage", "Olives"], // قائمة المكونات المتاحة
        
        // إضافة مكون جديد للقائمة
        addIngredient(event) {
            let value = event.target.value;
            if (value && !this.selectedIngredient.includes(value)) {
                this.selectedIngredient.push(value);
            }
            event.target.value = ''; // إعادة تعيين الاختيار بعد الإضافة
        },

        // إزالة مكون معين
        removeIngredient(index) {
            this.selectedIngredient.splice(index, 1);
        }
    };
}
