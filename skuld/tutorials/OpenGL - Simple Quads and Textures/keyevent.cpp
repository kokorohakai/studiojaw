void keyevent(){
	SDL_Event event;
	//now we'll want to look for a key, ah good ol' 0x27 (escape key), we'll be using that to terminate the program.
	while( SDL_PollEvent( &event )){//sdl has a event buffer, use this well, things such has mouse movements, presses, key presses, joysticks, etc send symbols to this.
		if (event.type == SDL_KEYUP){//for now let's look for a key release
			if (event.key.keysym.sym==SDLK_ESCAPE){//check to see if escape was pressed
				appisrunning=false;
			}
		}
	}
}
