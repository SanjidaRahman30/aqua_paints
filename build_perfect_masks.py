import os
from PIL import Image, ImageFilter, ImageDraw

def build_living_room_mask():
    im = Image.open('assets/rooms/living-room.jpg').convert('RGB')
    w, h = im.size
    mask = Image.new('L', (w, h), 0)
    pix = im.load()
    mp = mask.load()

    for y in range(h):
        for x in range(w):
            # Floor
            if y >= 865:
                continue
            # Baseboard
            if y >= 848 and (pix[x, y][0] > 210 or pix[x, y][1] > 210):
                continue
            # Slatted wood panel on left
            if x < 322:
                continue
            # Sofa blanket / armrest
            if x < 580 and y >= 605:
                continue

            r, g, b = pix[x, y]
            diff = max(abs(r - g), abs(g - b), abs(r - b))
            brightness = (r + g + b) // 3

            # Main wall is smooth off-white
            if brightness >= 205 and diff <= 12:
                mp[x, y] = 255
            elif x >= 580 and y < 848 and brightness >= 180 and diff <= 10:
                mp[x, y] = 255

    mask = mask.filter(ImageFilter.GaussianBlur(1.2))
    rgba = Image.new('RGBA', (w, h), (255, 255, 255, 0))
    rgba.putalpha(mask)
    rgba.save('assets/rooms/living-room-mask.png')
    print('Updated living-room-mask.png')

def build_bedroom_mask():
    im = Image.open('assets/rooms/bedroom.jpg').convert('RGB')
    w, h = im.size
    mask = Image.new('L', (w, h), 0)
    pix = im.load()
    mp = mask.load()

    for y in range(h):
        for x in range(w):
            # Left curtains
            if x < 325:
                continue
            # Right curtains
            if x > 1310:
                continue
            # Sofa and coffee table below
            if y >= 530:
                continue
            # Center wall art
            if 630 <= x <= 1060 and 135 <= y <= 512:
                continue
            # Ceiling
            if y < 35:
                continue

            r, g, b = pix[x, y]
            diff = max(abs(r - g), abs(g - b), abs(r - b))
            brightness = (r + g + b) // 3

            # Neutral wall around the artwork and between curtains
            if 150 <= brightness <= 245 and diff <= 20:
                mp[x, y] = 255

    mask = mask.filter(ImageFilter.GaussianBlur(1.5))
    rgba = Image.new('RGBA', (w, h), (255, 255, 255, 0))
    rgba.putalpha(mask)
    rgba.save('assets/rooms/bedroom-mask.png')
    print('Updated bedroom-mask.png')

def build_living_room_3_mask():
    im = Image.open('assets/rooms/Living_Room_2.png').convert('RGB')
    w, h = im.size
    mask = Image.new('L', (w, h), 0)
    pix = im.load()
    mp = mask.load()

    for y in range(h):
        for x in range(w):
            # Floor / carpet
            if y >= 1050:
                continue
            # Right wood panel / door
            if x >= 1380:
                continue

            r, g, b = pix[x, y]
            diff = max(abs(r - g), abs(g - b), abs(r - b))
            brightness = (r + g + b) // 3

            # Furniture / TV unit
            if brightness < 150:
                continue

            if 160 <= brightness <= 240 and diff <= 18:
                mp[x, y] = 255

    mask = mask.filter(ImageFilter.GaussianBlur(1.5))
    rgba = Image.new('RGBA', (w, h), (255, 255, 255, 0))
    rgba.putalpha(mask)
    rgba.save('assets/rooms/Living_Room_3_Mask.png')
    print('Updated Living_Room_3_Mask.png')

def build_kids_room_mask():
    im = Image.open('assets/rooms/Kids_Room.png').convert('RGB')
    w, h = im.size
    mask = Image.new('L', (w, h), 0)
    pix = im.load()
    mp = mask.load()

    for y in range(h):
        for x in range(w):
            # Floor / rug / toys
            if y >= 1180:
                continue

            r, g, b = pix[x, y]
            diff = max(abs(r - g), abs(g - b), abs(r - b))
            brightness = (r + g + b) // 3

            # Toys / furniture with saturated colors
            if diff > 16:
                continue
            if brightness < 170:
                continue

            # Neutral wall
            if brightness >= 195 and diff <= 14:
                mp[x, y] = 255

    mask = mask.filter(ImageFilter.GaussianBlur(1.5))
    rgba = Image.new('RGBA', (w, h), (255, 255, 255, 0))
    rgba.putalpha(mask)
    rgba.save('assets/rooms/Kids_Room_Mask.png')
    print('Updated Kids_Room_Mask.png')

def build_exterior_mask():
    im = Image.open('assets/rooms/exterior.jpg').convert('RGB')
    w, h = im.size
    mask = Image.new('L', (w, h), 0)
    pix = im.load()
    mp = mask.load()

    for y in range(h):
        for x in range(w):
            # Top sky
            if y < 350 and pix[x, y][2] > pix[x, y][0] + 5 and (pix[x, y][0] + pix[x, y][1] + pix[x, y][2]) // 3 > 215:
                continue
            # Ground / driveway
            if y > 1250:
                continue

            r, g, b = pix[x, y]
            diff = max(abs(r - g), abs(g - b), abs(r - b))
            brightness = (r + g + b) // 3

            # Dark windows / window frames / shadows
            if brightness < 140:
                continue
            # Plants / green foliage
            if g > r + 10 or g > b + 10:
                continue

            # Exterior building facade
            if brightness >= 175 and diff <= 22:
                mp[x, y] = 255

    mask = mask.filter(ImageFilter.GaussianBlur(1.5))
    rgba = Image.new('RGBA', (w, h), (255, 255, 255, 0))
    rgba.putalpha(mask)
    rgba.save('assets/rooms/mxterior_mask.png')
    rgba.save('assets/rooms/exterior-mask.png')
    print('Updated mxterior_mask.png and exterior-mask.png')

if __name__ == '__main__':
    build_living_room_mask()
    build_bedroom_mask()
    build_living_room_3_mask()
    build_kids_room_mask()
    build_exterior_mask()
    print('All masks successfully built!')
