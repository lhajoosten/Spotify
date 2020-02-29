let currentPlaylist = [];
let audioElement;

function Audio() {

    this.currentlyPlaying;
    this.audio = document.createElement('audio');

    this.setTrack = (src) => {
        this.audio.src = src;
    };

    this.pause = () => {
        this.audio.pause();
    };

    this.play = () => {
        this.audio.play();
    };
}