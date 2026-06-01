
/**
 * Potential Bug: If the user added 2 videos, it should be handled.
 */
const video = document.getElementById('video');
const player_overlay = document.getElementById('player_overlay');
const player_buttons = document.getElementById('player_buttons');
let isPaused = true;
if(player_overlay){
	player_overlay.addEventListener('click', () => {
		player_buttons.classList.toggle('toggle');
		if(isPaused) { // Video isn't playing
			video.play();
			isPaused = false;
		} else { // Video is playing
			video.pause();
			isPaused = true;
		}
	})
}
