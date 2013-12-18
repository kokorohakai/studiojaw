#include "header.h"

int main (int argc, char *argv[]){
	screeninit();//get the screen up and going
	GLuint texture;
	double frame=0.0;
	texture=loadtexture("box.png");//load the test texture.
	while(appisrunning){
		frame+=.1;
		keyevent();//check for escape to quit
		//insert drawing code here.
		//basic example of how it works:
			//draw_quad(100,100,1000,100,100,127,127,255,255,0,0,0,texture);
		//crazy example of how it can works:
			//sillystuff();
		//another crazy example of how it can work:
		//draw_cube(0,0,500,100,100,100,255,255,255,255,int(frame),int(frame*2),0,texture);
		funnystuff();
		swapbuffers();//swap buffers - next frame.
	}
	return 0;
}
