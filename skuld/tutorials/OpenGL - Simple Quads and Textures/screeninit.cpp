void screeninit(){
	//first we need to tell SDL to initialize and what we're going to be doing with it:
	//in this case we only need to do video.
	SDL_Init ( SDL_INIT_EVERYTHING );
	//since we're using OpenGL we need to tell SDL that we are going to be using a double
	//buffered surface:
	SDL_GL_SetAttribute(SDL_GL_DOUBLEBUFFER, 1);
	//lets now set the video mode we like, here's the basic variables we'd want to pass
	//to SDL_SetVideoMode: width, height, color-depth, SDL_OPENGL and SDL_GL_DOUBLEBUFFER and/or SDL_FULLSCREEN
	//as you can see from the next example the options SDL_OPENGL, etc. need to be seperated with a logical or.
	SDL_SetVideoMode(1024, 768, 32, SDL_OPENGL | SDL_GL_DOUBLEBUFFER | SDL_FULLSCREEN);//in this example we'll only need 640x480x32bpp
	//now let's set some manditory things we'll need for rendering textured shapes.
	glFrontFace( GL_CCW );//tell opengl to use colored faces
	glClearColor( 0, 0, 0, 0 );//tell opengl to clear the buffer to black
	glMatrixMode( GL_PROJECTION );//changes the focus of our matrix to editing polys.
	glLoadIdentity( );//make our first step into the world coordinate system.
	//okay, this one works funny, the first number is the angle at which our camera's eye will arch in
	//the second number is the aspect ratio, most monitors are 4:3
	//the third number is our closest z coordinate
	//the forth number is our farthest z coordinate
	//play with this as you like, warning: larger ranges numbers will have more
	//floating point error, see your video cards specs for details on how this will
	//affect your rendering.
	gluPerspective(45.0f, -4.0/3.0,1.0, 1000.0);//the reason ratio is negative is force 'sane' screen coordinates, default coordinates are top=negative;left=negative;forward=negative, this wraps it to something a human can use.
	//the next line is for if you are drawing in 3D, there's no need to do this if you are using 2D In this example we'll leave it commented out, however just
	//in case you try to use this example for pure 3D rendering, you may want to enable this.
	glEnable( GL_DEPTH_TEST );
	glEnable( GL_COLOR_MATERIAL );//enable the ability to blend color to the texture
	glEnable( GL_TEXTURE_2D );//Then here we actually enable the texture.
	glTexGeni(GL_S, GL_TEXTURE_GEN_MODE, GL_SPHERE_MAP);//S and T are basically X and Y coord. to a texture
	glTexGeni(GL_T, GL_TEXTURE_GEN_MODE, GL_SPHERE_MAP);//these two commands tell how texture pixels will be generated to the screen
	glClear( GL_COLOR_BUFFER_BIT | GL_DEPTH_BUFFER_BIT );//clear the depth and color buffer (the entire buffer in general
	//glHint( GL_PERSPECTIVE_CORRECTION_HINT, GL_NICEST );//inform the renderer how nice to draw farther away objects
	glBlendFunc( GL_SRC_ALPHA, GL_ONE_MINUS_SRC_ALPHA );//tell the renderer how to handle blending RGB over another texture. This will basically do the standard colored glass effect based on how opaque the triangle or quad is.
	//al done! see www.opengl.org for more info on how all of these functions work.
	//or just simply try googling these functions to see what other parameters do and could be used.
	//now let's move on to rendering
}






