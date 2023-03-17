import './bootstrap';
import Alpine from 'alpinejs';
Alpine.store('edit', {
    open: false,
    id: 0,
    toggle() {
        this.open = ! this.open;
        Livewire.emitTo('EditArtist', "changeIdToOne")
    },
    changeId(id){
        this.id = id;
    }
});
window.Alpine = Alpine;
Alpine.start();
// document.addEventListener('alpine:init', () => {
//     console.log("started");

// });
