#include "rents.h"
#include <QApplication>

int main(int argc, char *argv[])
{
    QApplication a(argc, argv);
    Rents w;
    w.hide();
    AdminGuest *aG=new AdminGuest;
    aG->show();

    return a.exec();
}
