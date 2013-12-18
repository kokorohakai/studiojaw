void swapbuffers(){
	SDL_GL_SwapBuffers();//swap the buffers
	glClear( GL_COLOR_BUFFER_BIT | GL_DEPTH_BUFFER_BIT );//clear the next buffer
	glMatrixMode( GL_MODELVIEW );//reset the coordinate system
	glLoadIdentity( );//create our world coordinates.
}
