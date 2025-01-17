import SignaturePad from 'signature_pad';

export default function signature({ signaturePadId, state }) {
    return {
        signaturePadId,
        state,
        signaturePad: null,
        ratio: null,

        init() {
            // Resize the canvas to properly display signatures loaded via `fromDataURL`.
            this.resizeCanvas();

            // Create a new instance of signature pad and save it to the state.
            this.signaturePad = new SignaturePad(this.$refs.canvas, {
                penColor: '#334155', // slate-700
            });

            // Update the signature when the canvas is updated.
            this.signaturePad.addEventListener('afterUpdateStroke', () => {
                this.state = this.signaturePad.toDataURL();
                console.log(this.state)
            });

            // Load the canvas if a signature is available.
            if (this.state) {
                this.signaturePad.fromDataURL(this.state, { ratio: this.ratio });
            }
        },

        clear() {
            this.signaturePad.clear();
            this.state = null;
            this.$refs.fileInput = null;
        },

        resizeCanvas() {
            this.ratio = Math.max(window.devicePixelRatio || 1, 1);
            this.$refs.canvas.height = 185;
            this.$refs.canvas.width = this.$refs.canvas.offsetWidth * this.ratio;
            this.$refs.canvas.getContext('2d').scale(this.ratio, this.ratio);
        },

        uploadImage(event) {
            const file = event.target.files[0];

            if (! file || ! ['image/jpeg', 'image/png'].includes(file.type)) return;

            const reader = new FileReader();

            reader.onloadend = () => {
                // Set the signature.
                this.signaturePad.clear();
                this.state = reader.result;
                this.signaturePad.fromDataURL(this.state, { ratio: this.ratio });

                // Reset the file upload input.
                event.target.value = null;
            };

            reader.readAsDataURL(file);
        },
    }
}

function addBase64ToFileInput(base64String, fileName = 'image.png', mimeType = 'image/png') {
    // Remove data URL prefix if present
    const base64Content = base64String.replace(/^data:.*?;base64,/, '');

    // Convert base64 to binary
    const binaryString = atob(base64Content);
    const bytes = new Uint8Array(binaryString.length);

    for (let i = 0; i < binaryString.length; i++) {
        bytes[i] = binaryString.charCodeAt(i);
    }

    // Create Blob and File
    const blob = new Blob([bytes], { type: mimeType });
    const file = new File([blob], fileName, { type: mimeType });

    // Create a FileList-like object
    const dataTransfer = new DataTransfer();
    dataTransfer.items.add(file);

    // Add to file input
    const fileInput = document.querySelector('input[type="file"]');
    fileInput.files = dataTransfer.files;

    return file; // Return the File object if needed
}

// Example usage:
const base64String = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAA...';
addBase64ToFileInput(base64String, 'myImage.png', 'image/png');
