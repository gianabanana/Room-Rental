#ifndef POPUPADDBOARDER_H
#define POPUPADDBOARDER_H

#include <QWidget>

namespace Ui {
class PopUpAddBoarder;
}

class PopUpAddBoarder : public QWidget
{
    Q_OBJECT

public:
    explicit PopUpAddBoarder(QWidget *parent = 0);
    ~PopUpAddBoarder();

private slots:
    void on_pushButton_clicked();

private:
    Ui::PopUpAddBoarder *ui;
};

#endif // POPUPADDBOARDER_H
