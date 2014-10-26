
import xml.etree.ElementTree as ET
tree = ET.parse('QSEE/schema.xml')
root = tree.getroot()

def main():
    #one = root[0][count].text
    #print(one)
    for line in root.readlines():
        print(line)
        
if __name__ == "__main__": main()
