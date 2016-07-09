#include "stdafx.h"
#include "windows.h"


int emitcode[] = 
{0x83ec8b55,0x565340ec,0x0c758b57,0x8b087d8b,
 0x348d104d,0xcf3c8dce,0x6f0fd9f7,0x6f0fce04,
 0x0f08ce4c,0x10ce546f,0xce5c6f0f,0x646f0f18,
 0x6f0f20ce,0x0f28ce6c,0x30ce746f,0xce7c6f0f,
 0x04e70f38,0x4ce70fcf,0xe70f08cf,0x0f10cf54,
 0x18cf5ce7,0xcf64e70f,0x6ce70f20,0xe70f28cf,
 0x0f30cf74,0x38cf7ce7,0x7508c183,0xf8ae0fad,
 0x5e5f770f,0x5de58b5b,0xccccccc3};

int _tmain(int argc, _TCHAR* argv[])
{
    int *src = new int[64];
    int *dst = new int[64];
    int *dst2 = new int[64];

    for (int i = 0; i < 64; ++i){
        src[i] = i;
    }

    //fastercopy(dst,src, 64/2);

    void* address = NULL;
    address= VirtualAlloc(NULL,
            sizeof(emitcode),
            MEM_COMMIT|MEM_RESERVE,
            PAGE_EXECUTE_READWRITE);

    memcpy(address,emitcode,sizeof(emitcode));

    //call emit code from assemble
    __asm {
      push        20h  
      mov         eax,dword ptr [src]  
      push        eax  
      mov         ecx,dword ptr [dst]  
      push        ecx
      mov         ecx, dword ptr [address]
      call        ecx
      add         esp,0Ch 
    }

    for (int i = 0; i < 64; ++i){
        printf("%d ",dst[i]);
    }

    //call emit code from function pointer
    typedef void (*FASTCALL)(void* dst, void* src, int len);
    FASTCALL fastcall;
    fastcall = (FASTCALL)address;
    fastcall(dst2,src,64/2);

    printf("\n");
    for (int i = 0; i < 64; ++i){
        printf("%d ",dst2[i]);
    }

    return 0;
}