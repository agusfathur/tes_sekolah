<div>
   ini dari livewire
   <input type="text" name="nama" id="nama" wire:model.live="nama">
   <p>Nama saya adalah {{ $nama }}</p>

   <input type="number" name="" id="" wire:model.live="number">
   <button wire:click='plus'>+ PLUS</button>
   <button wire:click='minus'>+ MINUS</button>
</div>
