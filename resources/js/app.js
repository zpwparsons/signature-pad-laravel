import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
import signature from "./signature";

Alpine.data('signature', signature);

Livewire.start();
